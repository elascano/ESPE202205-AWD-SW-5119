/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.keyboard;

/**
 *
 * @author Fernando Paredes
 */


public class Keyboard {
    String id;
    String brand;
    String weight;
    String color;

    public Keyboard(){
        id="";
        brand="";
        weight="";
        color="";        
    }

    public Keyboard(String id, String brand, String weight, String color) {
        this.id = id;
        this.brand = brand;
        this.weight = weight;
        this.color = color;
    }

 
    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getBrand() {
        return brand;
    }

    public void setBrand(String brand) {
        this.brand = brand;
    }

    public String getWeight() {
        return weight;
    }

    public void setWeight(String weight) {
        this.weight = weight;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    @Override
    public String toString() {
        return "Keyboard{" + "id=" + id + ", brand=" + brand + ", weight=" + weight + ", color=" + color + '}';
    }

    

    
    
}

