package com.shahilpravind.smartpark;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import static com.shahilpravind.smartpark.Constants.mIcons;
import static com.shahilpravind.smartpark.Constants.mItemNames;

public class TileAdapter extends BaseAdapter {
    private Context mContext;
    private AppCompatActivity mainActivity = null;
    private static int colorCounter = 0;

    private int[] mColors = {
            R.color.tile1, R.color.tile2,
            R.color.tile3, R.color.tile4,
            R.color.tile5, R.color.tile6,
    };

    public TileAdapter(Context c) {
        mContext = c;
    }

    public int getCount()
    {
        return mItemNames.length;
    }

    public Object getItem(int position)
    {
        return null;
    }

    public String getItemName(int position)
    {
        return mItemNames[position];
    }

    public long getItemId(int position)
    {
        return 0;
    }

    // create a new button
    public View getView(int position, View convertView, ViewGroup parent)
    {
        View view;
        if (convertView == null)
            view = LayoutInflater.from(parent.getContext()).inflate(R.layout.tile, parent, false);
        else
            view = (View) convertView;

        view.setBackgroundColor(mContext.getResources().getColor( getTileColor(position) ));

        ImageView thumbnail = (ImageView) view.findViewById(R.id.thumbnail);
        thumbnail.setImageResource(mIcons[position]);

        TextView label = (TextView) view.findViewById(R.id.label);
        label.setText(mItemNames[position]);

        return view;
    }

    private int getTileColor(int pos)
    {
        return mColors[ pos % mColors.length ];
    }
}
