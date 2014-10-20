package com.foodvisor;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.ActionBarActivity;
import android.view.View;
import android.widget.TextView;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.os.AsyncTask;
import android.util.Log;


public class MainActivity extends ActionBarActivity  {
    final String TAG = "MainActivit.java";
    private TextView console, json_output;
    // set your json string url herey
    public String yourJsonStringUrl;
    // contacts JSONArray
    public JSONArray dataJsonArr = null;
    @Override
    public void onCreate(Bundle state) {
        super.onCreate(state);
        setContentView(R.layout.activity_main);
        this.console = (TextView)super.findViewById(R.id.console);
        this.json_output = (TextView)super.findViewById(R.id.json_output);
    }

    public void launchFoodvisorActivity(View v) {
        Intent intent = new Intent(this, FoodvisorScannerActivity.class);
        startActivityForResult(intent, 1);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        String bar_code = data.getStringExtra("bar_code");
        String status = data.getStringExtra("status");
        String status_details = data.getStringExtra("status_details");
        String attentions = data.getStringExtra("attentions");
        this.console.append("onActivityResult, request code: " + bar_code + "\n\n");
        Log.e(TAG, "bar_code: "+bar_code);
        Log.e(TAG, "status: "+status);
        Log.e(TAG, "status_details: "+status_details);
        Log.e(TAG,"attentions: "+ attentions);

    }

}