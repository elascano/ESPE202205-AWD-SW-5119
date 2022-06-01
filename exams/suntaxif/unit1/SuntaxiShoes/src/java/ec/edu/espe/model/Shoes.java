/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.model;

/**
 *
 * @author HP PC
 */
public class Shoes {

    int id;
    int size;
    String trademark;
    String type;
    String color;
    double price;
    String description;

    public Shoes() {
        id = 0;
        trademark = "";
        size = 0;
        type = "";
        color = "";
        price = 0.0;
        description="";
    }

    public Shoes(int id,String trademark,int size, String type, String color, double price, String description) {
        this.id = id;
        this.trademark = trademark;
        this.size = size;
        this.type = type;
        this.color = color;
        this.price = price;
        this.description=description;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getSize() {
        return size;
    }

    public void setSize(int size) {
        this.size = size;
    }

    public String getTrademark() {
        return trademark;
    }

    public void setTrademark(String trademark) {
        this.trademark = trademark;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

}
