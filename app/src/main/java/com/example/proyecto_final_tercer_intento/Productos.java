package com.example.proyecto_final_tercer_intento;

public class Productos {
    int codigo;
    String descripcion;

    public int getCodigo() {
        return codigo;
    }

    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    String autor;
    String tipo;

    public Productos() {
    }
//CAROLINA ESTO LO DEJASTE EMPEZADO, TENES QUE CAMBIAR LAS VARIABLES REVISA BIEN!!!!
    public Productos(int codigo, String descripcion, String autor, String tipo) {
        this.codigo = codigo;
        this.descripcion = descripcion;
        this.autor = autor;
        this.tipo = tipo;
    }

}
