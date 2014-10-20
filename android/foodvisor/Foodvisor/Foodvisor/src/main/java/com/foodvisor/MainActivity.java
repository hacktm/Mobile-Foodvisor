package com.foodvisor;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.ActionBarActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;

import java.io.File;
import java.net.URI;
import java.text.NumberFormat;


public class MainActivity extends ActionBarActivity  {
    final String TAG = "MainActivit.java";
    private TextView product_title,instruction_text, detail_text;
    private LinearLayout detail_layout, product_layout, status_layout,attentions_layout;
    private ImageView img_status;
    // set your json string url herey
    public String yourJsonStringUrl;
    public JSONArray dataJsonArr = null;
    public String bar_code, status , status_details ,attentions, name;
    @Override
    public void onCreate(Bundle state) {
        super.onCreate(state);
        setContentView(R.layout.activity_main);
    }

    public void launchFoodvisorActivity(View v) {
        Intent intent = new Intent(this, FoodvisorScannerActivity.class);
        startActivityForResult(intent, 1);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        bar_code = data.getStringExtra("bar_code");

        yourJsonStringUrl = "http://foodvisor.net/api/index.php?barcode=" + bar_code;
        Log.e(TAG, yourJsonStringUrl);

//        AsyncTask<String, String, String> dataJsonArr = new AsyncTaskParseJson().execute();

        new AsyncTaskParseJson(){
            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                if (s == null) {
                    Toast.makeText(getApplicationContext(), "data not retrieved", Toast.LENGTH_SHORT).show();
                    return;
                }

                Log.e(TAG, "bar_code: "+bar_code);
                Log.e(TAG,"name:"+name);
                Log.e(TAG, "status: "+status);
                Log.e(TAG, "status_details: "+status_details);
                Log.e(TAG,"attentions: "+ attentions);
                img_status = (ImageView)findViewById(R.id.img_status);
                detail_layout = (LinearLayout)findViewById(R.id.detail_layout);
                product_layout = (LinearLayout)findViewById(R.id.product_layout);
                status_layout = (LinearLayout)findViewById(R.id.product_layout);
                attentions_layout= (LinearLayout)findViewById(R.id.product_layout);
                product_title =(TextView)findViewById(R.id.product_title);
                instruction_text =(TextView)findViewById(R.id.instruction_text);
                detail_text =(TextView)findViewById(R.id.detail_text);

                int status_number =Integer.parseInt(status.replaceAll("[\\D]", ""));

                if(status_number == 1){
                    product_title.setText(name);
                    img_status.setImageDrawable(getResources().getDrawable(R.drawable.img1));
                    instruction_text.setText("We found this product to be totally healthy for you.");
                    detail_text.setText("Additives:"+status_details);
                }else if(status_number ==2){
                    product_title.setText(name);
                    img_status.setImageDrawable(getResources().getDrawable(R.drawable.img2));
                    instruction_text.setText("We found some unhealthy ingredients, so use this product with care!");
                    detail_text.setText("Additives:"+status_details);
                }else if(status_number ==3){
                    product_title.setText(name);
                    img_status.setImageDrawable(getResources().getDrawable(R.drawable.img3));
                    instruction_text.setText("We found major health issues with this product, you shouldn't use it! ");
                    detail_text.setText("Additives: "+status_details+"\n\nDetails: " + attentions);

                }
                instruction_text.setVisibility(View.VISIBLE);
                img_status.setVisibility(View.VISIBLE);
                attentions_layout.setVisibility(LinearLayout.VISIBLE);
                detail_layout.setVisibility(LinearLayout.VISIBLE);
                product_layout.setVisibility(LinearLayout.VISIBLE);
                status_layout.setVisibility(LinearLayout.VISIBLE);

            }
        }.execute();


//        status = (String)data.getStringExtra("status");
//        status_details = data.getStringExtra("status_details");
//        attentions = data.getStringExtra("attentions");
//        name = data.getStringExtra("name");


        /*
        if(status == "1"){
            img_status.setImageURI(Uri.fromFile(new File("res/drawable/1.png")));
        }else if(status =="2"){
            img_status.setImageURI(Uri.fromFile(new File("res/drawable/1.png")));
        }else if(status =="3"){
            img_status.setImageURI(Uri.fromFile(new File("res/drawable/1.png")));
        }

         */

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

                if (json == null) {
                    return null;
                }
                // get the array of users
                dataJsonArr = json.getJSONArray("result");

                // loop through all users
                for (int i = 0; i < dataJsonArr.length(); i++) {

                    JSONObject c = dataJsonArr.getJSONObject(i);

                    // Storing each json item in variable
                    name = c.getString("name");
                    status = c.getString("status");
                    status_details = c.getString("status_details");
                    attentions = c.getString("attentions");
                }
                return json.toString();

            } catch (JSONException e) {
                e.printStackTrace();
                return null;
            }
        }

    }
}