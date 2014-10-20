package com.foodvisor;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.ActionBarActivity;

import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import com.google.zxing.Result;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import me.dm7.barcodescanner.zxing.ZXingScannerView;

public class FoodvisorScannerActivity extends ActionBarActivity implements ZXingScannerView.ResultHandler {
    final String TAG = "FoodvisorScannerActivity.java";
    private TextView console, json_output;
    // set your json string url herey
    public String yourJsonStringUrl;
    public String status;
    public String status_details;
    public String attentions;
    // contacts JSONArray
    public JSONArray dataJsonArr = null;
    private ZXingScannerView mScannerView;

    @Override
    public void onCreate(Bundle state) {
        super.onCreate(state);
        mScannerView = new ZXingScannerView(this);
        setContentView(mScannerView);
    }

    @Override
    public void onResume() {
        super.onResume();
        mScannerView.setResultHandler(this);
        mScannerView.startCamera();
    }

    @Override
    public void onPause() {
        super.onPause();
        mScannerView.stopCamera();
    }

    @Override
    public void handleResult(Result rawResult) {
        Intent result = new Intent();
        result.putExtra("bar_code", rawResult.getText());
        setResult(RESULT_OK, result);
        Toast.makeText(this, "Contents = " + rawResult.getText() +
                ", Format = " + rawResult.getBarcodeFormat().toString(), Toast.LENGTH_SHORT).show();
        yourJsonStringUrl = "http://foodvisor.net/api/index.php?barcode=" + rawResult.getText();
        Log.e(TAG, yourJsonStringUrl);
        AsyncTask<String, String, String> json_returned = new AsyncTaskParseJson().execute();

        try {
            Thread.sleep(2000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        result.putExtra("status", status);
        result.putExtra("status_details", status_details);
        result.putExtra("attentions", attentions);

        finish();
    }

    // you can make this class as another java file so it will be separated from your main activity.
    public class AsyncTaskParseJson extends AsyncTask<String, String, String> {


        @Override
        protected void onPreExecute() {
        }

        @Override
        protected String doInBackground(String... arg0) {

            try {

                // instantiate our json parser
                JsonParser jParser = new JsonParser();

                // get json string from url
                JSONObject json = jParser.getJSONFromUrl(yourJsonStringUrl);

                // get the array of users
                dataJsonArr = json.getJSONArray("result");

                // loop through all users
                for (int i = 0; i < dataJsonArr.length(); i++) {

                    JSONObject c = dataJsonArr.getJSONObject(i);

                    // Storing each json item in variable
                    status = c.getString("status");
                    status_details = c.getString("status_details");
                    attentions = c.getString("attentions");
                }

            } catch (JSONException e) {
                e.printStackTrace();
            }

            return null;
        }
    }
}
