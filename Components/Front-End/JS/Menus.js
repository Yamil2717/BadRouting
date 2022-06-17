UserMenu = document.getElementById('UserMenu');
UserMenu.addEventListener('click', UserMenuClick);

Submenu = document.getElementById('sub-menu');

function UserMenuClick() {
    if(Submenu.style.display === 'none') {
        Submenu.style.display = 'block';
    } else {
        Submenu.style.display = 'none';
    }
}

UserPanel = document.getElementById('UserPanel');
UserPanel.addEventListener('click', UserPanelClick);

Section = document.getElementById('user-panel');
Main = document.getElementById('main');

function UserPanelClick() {
    if(Section.style.display === 'block') {
        Section.style.display = 'none';
        main.style.marginLeft = '0';
    } else {
        Section.style.display = 'block';
        Main.style.marginLeft = '230px';
    }
}