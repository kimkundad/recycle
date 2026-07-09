<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>File Manager</title>
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Segoe UI', Arial, sans-serif; background: #f0f2f5; color: #1a1a2e; }

.fm-header {
    background: #1e293b;
    color: #fff;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    position: sticky;
    top: 0;
    z-index: 10;
}
.fm-header h1 { font-size: 15px; font-weight: 600; }
.fm-upload { display: flex; align-items: center; gap: 8px; }
.fm-upload label {
    background: #3b82f6;
    color: #fff;
    padding: 7px 14px;
    border-radius: 7px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    transition: background 0.15s;
}
.fm-upload label:hover { background: #2563eb; }
.fm-upload input[type=file] { display: none; }
#fm-upload-status { font-size: 12px; color: #94a3b8; }

.fm-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    gap: 10px;
    padding: 14px;
}
.fm-item {
    background: #fff;
    border: 2px solid transparent;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: border-color 0.15s, box-shadow 0.15s;
    position: relative;
}
.fm-item:hover { border-color: #3b82f6; box-shadow: 0 4px 12px rgba(59,130,246,0.2); }
.fm-item img { width: 100%; aspect-ratio: 1; object-fit: cover; display: block; }
.fm-item__name {
    padding: 6px 8px;
    font-size: 11px;
    color: #64748b;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* delete button */
.fm-delete {
    position: absolute;
    top: 5px; right: 5px;
    width: 24px; height: 24px;
    background: rgba(220,38,38,0.85);
    color: #fff;
    border: none;
    border-radius: 50%;
    font-size: 13px;
    line-height: 1;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.15s, background 0.15s;
    padding: 0;
}
.fm-item:hover .fm-delete { opacity: 1; }
.fm-delete:hover { background: rgba(185,28,28,1); }

.fm-empty { padding: 40px; text-align: center; color: #94a3b8; font-size: 14px; }
</style>
</head>
<body>

<div class="fm-header">
    <h1>📁 File Manager</h1>
    <div class="fm-upload">
        <label for="fm-file-input">+ อัพโหลดรูป</label>
        <input type="file" id="fm-file-input" accept="image/*" multiple>
        <span id="fm-upload-status"></span>
    </div>
</div>

<div class="fm-grid" id="fm-grid">
    @forelse(array_reverse($images) as $img)
    <div class="fm-item" data-path="{{ $img['path'] }}" onclick="selectImage('{{ $img['url'] }}')">
        <img src="{{ $img['url'] }}" alt="" loading="lazy">
        <div class="fm-item__name">{{ basename($img['url']) }}</div>
        <button class="fm-delete" onclick="deleteImage(event, this)" title="ลบรูป">✕</button>
    </div>
    @empty
    <div class="fm-empty" style="grid-column:1/-1">ยังไม่มีไฟล์ — อัพโหลดรูปแรกได้เลย</div>
    @endforelse
</div>

<script>
const CSRF = '{{ csrf_token() }}';

function selectImage(url) {
    if (window.opener && window.opener._spFileManagerCallback) {
        window.opener._spFileManagerCallback(url);
    }
    window.close();
}

function deleteImage(e, btn) {
    e.stopPropagation();
    if (!confirm('ลบรูปนี้ออกจาก DO Spaces?')) return;

    const item = btn.closest('.fm-item');
    const path = item.dataset.path;

    btn.disabled = true;
    btn.textContent = '…';

    fetch('{{ url('admin/sale-pages-files') }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': CSRF,
        },
        body: JSON.stringify({ path }),
    })
    .then(r => r.json())
    .then(data => {
        if (data.ok) {
            item.style.opacity = '0';
            item.style.transition = 'opacity 0.2s';
            setTimeout(() => item.remove(), 200);
        } else {
            btn.disabled = false;
            btn.textContent = '✕';
        }
    })
    .catch(() => {
        btn.disabled = false;
        btn.textContent = '✕';
    });
}

// upload multiple
document.getElementById('fm-file-input').addEventListener('change', async function () {
    const files = Array.from(this.files);
    if (!files.length) return;

    const status  = document.getElementById('fm-upload-status');
    const grid    = document.getElementById('fm-grid');
    const emptyEl = grid.querySelector('.fm-empty');

    status.textContent = `กำลังอัพโหลด 0/${files.length}…`;

    let done = 0;
    for (const file of files) {
        const fd = new FormData();
        fd.append('upload', file);

        try {
            const res  = await fetch('{{ url('api/sale-page/upload-image') }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': CSRF },
                body: fd,
            });
            const data = await res.json();
            if (data.url) {
                if (emptyEl) emptyEl.remove();
                const item = document.createElement('div');
                item.className = 'fm-item';
                item.dataset.path = data.path;
                item.onclick = () => selectImage(data.url);
                item.innerHTML = `
                    <img src="${data.url}" loading="lazy">
                    <div class="fm-item__name">${file.name}</div>
                    <button class="fm-delete" onclick="deleteImage(event,this)" title="ลบรูป">✕</button>`;
                grid.prepend(item);
            }
        } catch (e) {
            console.error(e);
        }

        done++;
        status.textContent = done < files.length ? `กำลังอัพโหลด ${done}/${files.length}…` : '';
    }

    this.value = '';
});
</script>
</body>
</html>
