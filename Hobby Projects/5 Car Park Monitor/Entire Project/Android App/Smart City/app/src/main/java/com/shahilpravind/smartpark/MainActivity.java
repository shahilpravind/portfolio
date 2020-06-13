package com.shahilpravind.smartpark;

import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    FragmentManager fragManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // initial fragment display - list of chat rooms
        fragManager = getSupportFragmentManager();

        HomeFragment homeFragment = new HomeFragment();
        FragmentTransaction transaction = fragManager.beginTransaction();
        transaction.add(R.id.main_layout, homeFragment);
        transaction.commit();
    }

    public void seg1(View view) {
        Intent intent = new Intent(view.getContext(), DcSeg1.class);
        startActivity(intent);
    }

    public void segOthers(View view) {
        Toast.makeText(view.getContext(), "Not yet available.", Toast.LENGTH_SHORT).show();
    }
}
