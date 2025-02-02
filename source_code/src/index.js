const { app, BrowserWindow, Menu, ipcMain } = require('electron');

const url = require('url');
const path = require('path');

let mainWindow;
let newProductWindow;

// Reload in Development for Browser Windows
if (process.env.NODE_ENV !== 'production') {
    require('electron-reload')(__dirname, {
        electron: path.join(__dirname, '../node_modules', '.bin', 'electron')
    });
}


app.on('ready', () => {

    // The Main Window
    mainWindow = new BrowserWindow({ width: 1100, height: 700 });

    mainWindow.loadURL(url.format({
        pathname: path.join(__dirname, 'http://localhost/electron-products-test-master/'),
        protocol: 'file',
        slashes: true
    }))

    // Menu
    const mainMenu = Menu.buildFromTemplate(templateMenu);
    // Set The Menu to the Main Window
    Menu.setApplicationMenu(mainMenu);

    // If we close main Window the App quit
    mainWindow.on('closed', () => {
        app.quit();
    });

});