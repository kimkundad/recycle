// obtain cookieconsent plugin
var cc = initCookieConsent();

// example logo
var logo = '<img src="https://wpnrayong.com/img/wpn-logo.png" alt="Logo" loading="lazy" style="margin-left: -4px; margin-bottom: -5px; height: 35px">';
var cookie = '🍪';

// run plugin with config object
cc.run({
    current_lang : 'en',
    autoclear_cookies : true,                   // default: false
    cookie_name: 'cc_cookie_demo1',             // default: 'cc_cookie'
    cookie_expiration : 365,                    // default: 182
    page_scripts: true,                         // default: false

    // auto_language: null,                     // default: null; could also be 'browser' or 'document'
    // autorun: true,                           // default: true
    // delay: 0,                                // default: 0
    // force_consent: false,
    // hide_from_bots: false,                   // default: false
    // remove_cookie_tables: false              // default: false
    // cookie_domain: location.hostname,        // default: current domain
    // cookie_path: "/",                        // default: root
    // cookie_same_site: "Lax",
    // use_rfc_cookie: false,                   // default: false
    // revision: 0,                             // default: 0

    gui_options: {
        consent_modal: {
            layout: 'box',                      // box,cloud,bar
            position: 'bottom left',           // bottom,middle,top + left,right,center
            transition: 'slide'                 // zoom,slide
        },
        settings_modal: {
            layout: 'box',                      // box,bar
            // position: 'left',                // right,left (available only if bar layout selected)
            transition: 'slide'                 // zoom,slide
        }
    },

    onFirstAction: function(){
        console.log('onFirstAction fired');
    },

    onAccept: function (cookie) {
        console.log('onAccept fired ...');
    },

    onChange: function (cookie, changed_preferences) {
        console.log('onChange fired ...');
    },

    languages: {
        'en': {
            consent_modal: {
                title: cookie + ' เราใช้คุกกี้ ! ',
                description: 'สวัสดี, เราใช้คุกกี้เพื่อเพิ่มประสิทธิภาพและมอบประสบการณ์ที่ดีที่สุดในการใช้งานเว็บไซต์ของเรา <button type="button" data-cc="c-settings" class="cc-link">เรียนรู้เพิ่มเติม</button>',
                primary_btn: {
                    text: 'ยอมรับทั้งหมด',
                    role: 'accept_all'              // 'accept_selected' or 'accept_all'
                },
                secondary_btn: {
                    text: 'ปฏิเสธทั้งหมด',
                    role: 'accept_necessary'        // 'settings' or 'accept_necessary'
                }
            },
            settings_modal: {
                title: logo,
                save_settings_btn: 'Save settings',
                accept_all_btn: 'Accept all',
                reject_all_btn: 'Reject all',
                close_btn_label: 'Close',
                cookie_table_headers: [
                    {col1: 'Name'},
                    {col2: 'Domain'},
                    {col3: 'Expiration'},
                    {col4: 'Description'}
                ],
                blocks: [
                    {
                        title: 'ตั้งค่าความเป็นส่วนตัว 📢',
                        description: 'เมื่อคุณเข้าชมเว็บไซต์ของเรา เว็บไซต์ของเราจะจัดเก็บหรือดึงข้อมูลจากเบราว์เซอร์ของคุณซึ่งส่วนใหญ่อยู่ในรูปแบบของ cookie ข้อมูลเหล่านี้อาจเกี่ยวกับคุณ การตั้งค่าของคุณ อุปกรณ์ของคุณ หรือเพื่อช่วยให้เว็บไซต์ทำงานอย่างที่คุณต้องการ ซึ่งเป็นข้อมูลที่ไม่สามารถระบุตัวตนของคุณได้โดยตรง แต่ช่วยให้คุณใช้งานเว็บตามความต้องการส่วนบุคคลได้มากยิ่งขึ้น โดยที่เราเคารพสิทธิความเป็นส่วนตัวของคุณ คุณสามารถปิดการทำงานของ cookie บางประเภทได้ โปรดคลิกที่หัวข้อประเภทต่างๆ เพื่อดูข้อมูลเพิ่มเติมและเปลี่ยนการตั้งค่าเริ่มต้นในการใช้งาน cookie อย่างไรก็ตาม คุณควรทราบว่าการปิดการทำงานของ cookie บางประเภทอาจส่งผลต่อการใช้งานเว็บไซต์และบริการของเรา <a href="https://wpnrayong.com/term" class="cc-link">นโยบายข้อมูลส่วนบุคคล</a>.'
                    }, {
                        title: 'คุกกี้ประเภทจำเป็นถาวร',
                        description: 'คุกกี้ประเภทนี้จำเป็นสำหรับการทำงานของเว็บไซต์และ/หรือแอปพลิเคชันของเรา เพื่อช่วยให้คุณสามารถเข้าถึงข้อมูลและใช้เว็บไซต์และ/หรือแอปพลิเคชันของเราได้อย่างปลอดภัย จึงไม่สามารถปิดการใช้คุกกี้ประเภทนี้ได้',
                        toggle: {
                            value: 'necessary',
                            enabled: true,
                            readonly: true          // cookie categories with readonly=true are all treated as "necessary cookies"
                        }
                    }, {
                        title: 'คุกกี้เพื่อการใช้งานเว็บไซต์',
                        description: 'คุกกี้ประเภทนี้จะช่วยให้เรา “จดจำ” คุณระหว่างการเยี่ยมชมและตั้งค่าเว็บไซต์และ/หรือแอปพลิเคชันของเรา ตามลักษณะการใช้งานให้สอดคล้องกับสิ่งที่คุณเลือกเพื่ออำนวยความสะดวกเมื่อคุณกลับเข้ามาใช้เว็บไซต์และ/หรือแอปพลิเคชันของเรา ในครั้งถัดไป เช่น การจดจำชื่อผู้ใช้งานของคุณ การปรับขนาดตัวอักษร ภาษาและส่วนอื่นๆ บนหน้าเว็บไซต์และ/หรือแอปพลิเคชันของเรา',
                        toggle: {
                            value: 'targeting',     // there are no default categories => you specify them
                            enabled: true,
                            readonly: false
                        }
                    }, {
                        title: 'คุกกี้เพื่อการวิเคราะห์',
                        description: 'คุกกี้ประเภทนี้ช่วยให้เราสามารถวิเคราะห์หรือวัดผลการทำงาน เพื่อให้เราเข้าใจถึงความสนใจของคุณ เช่น การประมวลผลจำนวนผู้เยี่ยมชมเว็บไซต์และ/หรือแอปพลิเคชันของเรา พฤติกรรมการเยี่ยมชมเว็บไซต์และ/หรือแอปพลิเคชันของเรา จำนวนหน้าที่คุณเข้าใช้งาน โดยเราจะใช้ข้อมูลดังกล่าวในการปรับปรุงและพัฒนาประสิทธิภาพการทำงานของเว็บไซต์และ/หรือแอปพลิเคชันของเรา ให้ตอบสนองตามความต้องการและการใช้งานของคุณให้ดียิ่งขึ้น',
                        toggle: {
                            value: 'analytics',
                            enabled: true,
                            readonly: false
                        }
                    }, {
                        title: 'ข้อมูลเพิ่มเติม',
                        description: 'สำหรับข้อสงสัยใด ๆ เกี่ยวกับนโยบายของฉันเกี่ยวกับคุกกี้และตัวเลือกของคุณ <a class="cc-link" href="https://wpnrayong.com/contact">ติดต่อเรา</a>.',
                    }
                ]
            }
        }
    }

});
