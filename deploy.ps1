# ==========================================
# deploy.ps1 — Build & Push (Windows)
# ==========================================
# Builds from a clean checkout of HEAD, so uncommitted work never ships.
# Usage: .\deploy.ps1            -> tag yyyy-MM-dd-01
#        .\deploy.ps1 -Suffix 02 -> second deploy of the day

param([string]$Suffix = "01")

$registry   = "ghcr.io/kimkundad"
$tag        = "$(Get-Date -Format 'yyyy-MM-dd')-$Suffix"
$appImage   = "$registry/recycle-app:$tag"
$nginxImage = "$registry/recycle-nginx:$tag"
$commit     = git rev-parse --short HEAD

if (git status --porcelain) {
    Write-Host "Note: uncommitted changes are NOT included in this build." -ForegroundColor Yellow
}
git fetch -q origin
if ([int](git rev-list --count "origin/main..HEAD") -gt 0) {
    Write-Host "Note: HEAD ($commit) has commits that are not pushed to origin/main." -ForegroundColor Yellow
}

$ctx = Join-Path $env:TEMP "recycle-build-$tag"
if (Test-Path $ctx) { git worktree remove --force $ctx }
git worktree add --detach $ctx HEAD
if ($LASTEXITCODE) { throw "git worktree add failed" }

try {
    Write-Host "Building $appImage from $commit"
    docker build --pull -f "$ctx\Dockerfile.prod" --target app-runtime -t $appImage $ctx
    if ($LASTEXITCODE) { throw "app image build failed" }

    Write-Host "Building $nginxImage"
    docker build --pull -f "$ctx\Dockerfile.prod" --target nginx-runtime -t $nginxImage $ctx
    if ($LASTEXITCODE) { throw "nginx image build failed" }

    Write-Host "Pushing images..."
    docker push $appImage
    if ($LASTEXITCODE) { throw "push $appImage failed" }
    docker push $nginxImage
    if ($LASTEXITCODE) { throw "push $nginxImage failed" }
}
finally {
    git worktree remove --force $ctx
}

Write-Host ""
Write-Host "Done! Commit $commit. Deploy on server with: ./deploy.sh $tag"
