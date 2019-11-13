package com.example.proyecto_final_tercer_intento;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class ConsultaAutor extends AppCompatActivity {

    private Button btn_consultaporNombre;
    private EditText et_autor;
    boolean inputEd=false;

    MantenimientoMySQL manto = new MantenimientoMySQL();
    Dto datos = new Dto();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_consulta_autor);

        btn_consultaporNombre.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(et_autor.getText().toString().length()==0){
                    et_autor.setError("Campo Obligatorio");
                    inputEd = false;

                }else{
                    inputEd = true;

                }
                if (inputEd){
                    String autor = et_autor.getText().toString();
                    manto.consultarAutor(ConsultaAutor.this, autor);
                    et_autor.requestFocus();
                    mostrar();

                }
            }
        });
    }


    private void mostrar() {
        Intent i  = new Intent(this, ConsultaAutor.class);
        startActivity(i);
    }
}
