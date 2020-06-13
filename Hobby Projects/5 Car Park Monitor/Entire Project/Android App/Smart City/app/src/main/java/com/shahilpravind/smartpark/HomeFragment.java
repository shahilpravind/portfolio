package com.shahilpravind.smartpark;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.FrameLayout;
import android.widget.GridView;
import android.widget.Toast;


public class HomeFragment extends Fragment {

    View view;

    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState)
    {
        view = inflater.inflate(R.layout.fragment_home, container, false);

        displayHomeScreen();

        return view;
    }

    public void displayHomeScreen() {
        GridView tileView = (GridView) getLayoutInflater().inflate(R.layout.home_screen, null);
        final TileAdapter tileAdapter = new TileAdapter(getContext());
        tileView.setAdapter(tileAdapter);

        tileView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int position, long id) {
                String itemName = tileAdapter.getItemName(position);
                onHomeView(itemName);
            }
        });

        FrameLayout frameLayout = (FrameLayout) view.findViewById(R.id.fragment_frame);
        frameLayout.addView(tileView);
    }

    private void onHomeView(String item) {
        switch (item) {
            case "Damodar City":
                segmentChange();
                break;
            default:
                Toast.makeText(view.getContext(), "Not yet available.", Toast.LENGTH_SHORT).show();
                break;
        }
    }

    private void segmentChange() {
        ParkSegmentFragment parkFragment = new ParkSegmentFragment();

        FragmentTransaction transaction = getActivity().getSupportFragmentManager().beginTransaction();
        transaction.replace(R.id.main_layout, parkFragment);
        transaction.addToBackStack(null);
        transaction.commit();
    }
}