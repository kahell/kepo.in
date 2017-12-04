package com.example.kahell.projectakhir;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

public class Register extends AppCompatActivity {
    EditText name, email, password;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        name = (EditText) findViewById(R.id.name);
        email = (EditText) findViewById(R.id.email);
        password = (EditText) findViewById(R.id.password);
    }

    public void onRegister(View view){
        String str_name = name.getText().toString();
        String str_email = email.getText().toString();
        String str_password = password.getText().toString();
        String type = "register";
        BackgroundWorker backgroundWorker = new BackgroundWorker(this);
        backgroundWorker.execute(type,str_name, str_email,str_password);
    }

    public void openLogin(View view)
    {
        startActivity(new Intent(this, Login.class));
    }
}
