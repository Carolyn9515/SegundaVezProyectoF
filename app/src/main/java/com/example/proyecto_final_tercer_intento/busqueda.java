package com.example.proyecto_final_tercer_intento;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.widget.Toast;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AlertDialog;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONArray;
import org.json.JSONException;

import java.util.HashMap;
import java.util.Map;

public class busqueda {

        Dto datos = new Dto();

        boolean estadoGuardar = false;
        boolean estadoEliminar = false;

        private ProgressDialog pd;
        AlertDialog.Builder dialogo1;
        AlertDialog.Builder dialogo;
        ProgressDialog progressDialog;

        //List<Productos> productosList;
        //List<> productosList;
        ProductsAdapter adapter;


        public void consultarDescripcion(final Context context, final String autor){

            progressDialog = new ProgressDialog(context);
            progressDialog.setCancelable(false);
            progressDialog.setMessage("Espere por favor, Estamos trabajando en su petición en el servidor");
            progressDialog.show();

            String url  = Config.urlbuscarhimnario;

            StringRequest stringRequest = new StringRequest(Request.Method.POST,
                    url,
                    new Response.Listener<String>() {
                        @RequiresApi(api = Build.VERSION_CODES.M)
                        @SuppressLint("ResourceType")
                        @Override
                        public void onResponse(String response) {
                            if(response.equals("0")) {
                                Toast.makeText(context, "No se encontrarón resultados para la búsqueda especificada.", Toast.LENGTH_SHORT).show();
                                progressDialog.dismiss();
                            }else{
                                try {
                                /*
                                Toast toast = Toast.makeText(getApplicationContext(), response, Toast.LENGTH_SHORT);
                                toast.setGravity(Gravity.CENTER, 0, 0);
                                toast.show();
                                */
                                    JSONArray jsonArray = new JSONArray(response);

                                    String nombre = jsonArray.getJSONObject(0).getString("autor");



                                    datos.setAutor(nombre);

                                    Intent intent = new Intent(context, MainActivity.class);

                                    intent.putExtra("autor", nombre);

                                    //intent.setFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                                    context.startActivity(intent);

                                    progressDialog.dismiss();

                                } catch (JSONException e) {
                                    e.printStackTrace();
                                }
                            }
                            progressDialog.dismiss();
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            if(error != null){
                                Toast.makeText(context, "No se ha podido establecer conexión con el servidor. Verifique su acceso a Internet.", Toast.LENGTH_LONG).show();
                                progressDialog.dismiss();
                            }
                        }
                    }) {
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> map = new HashMap<String, String>();
                    map.put("autor", autor);
                    return map;
                }
            };

            MySingleton.getInstance(context).addToRequestQueue(stringRequest);

        }



    }

