package com.example.kahell.projectakhir;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

public class Login extends AppCompatActivity {
    EditText Email, Password;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        Email = (EditText) findViewById(R.id.email);
        Password = (EditText) findViewById(R.id.password);
    }

    public void onLogin(View view)
    {
        String email = Email.getText().toString();
        String password = Password.getText().toString();
        String type = "login";
        BackgroundWorker backgroundWorker = new BackgroundWorker(this);
        backgroundWorker.execute(type, email, password);
    }

    public void openRegister(View view)
    {
        startActivity(new Intent(this, Register.class));
    }
}
