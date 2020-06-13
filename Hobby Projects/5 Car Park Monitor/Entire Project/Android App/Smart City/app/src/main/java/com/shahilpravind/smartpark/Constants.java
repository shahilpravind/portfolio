package com.shahilpravind.smartpark;

public final class Constants {
    private Constants() {
        // instantiation restricted
    }

    public static final String SERVER_ADDRESS = "http://10.0.2.2";
    public static final String SERVER_PORT_ADDRESS = SERVER_ADDRESS + ":3000";

    public static final String[] mItemNames = {
            "Damodar City", "USP", "MHCC", "Tappoo City", "ABCD", "EFGH", "IJKL", "MNOP"
    };

    public static final int[] mIcons = {
            R.drawable.ic_logo_48dp,
            R.drawable.ic_logo_48dp,
            R.drawable.ic_logo_48dp,
            R.drawable.ic_logo_48dp,
            R.drawable.ic_logo_48dp,
            R.drawable.ic_logo_48dp,
            R.drawable.ic_logo_48dp,
            R.drawable.ic_logo_48dp
    };
}
