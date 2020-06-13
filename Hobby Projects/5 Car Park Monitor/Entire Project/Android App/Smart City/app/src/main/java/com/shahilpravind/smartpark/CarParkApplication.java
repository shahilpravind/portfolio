package com.shahilpravind.smartpark;

import android.app.Application;

import java.net.URISyntaxException;

import io.socket.client.IO;
import io.socket.client.Socket;

public class CarParkApplication extends Application {
    private Socket mSocket;

    {
        try {
            mSocket = IO.socket(Constants.SERVER_PORT_ADDRESS);
        } catch (URISyntaxException e) {
            throw new RuntimeException(e);
        }
    }

    public Socket getSocket() {
        return mSocket;
    }
}
