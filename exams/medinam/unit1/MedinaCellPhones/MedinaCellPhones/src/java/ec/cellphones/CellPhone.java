/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.cellphones;

import org.bson.Document;

/**
 *
 * @author Martin
 */
public class CellPhone {

    static void insertOne(Document data) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    
    private String screen;
    private double camara;
    private double weight;
    private boolean jack;
    private String color;
    private String brand;
    private String storage;
    private String system;

    public CellPhone() {
        this.screen = "";
        this.camara = 0;
        this.weight = 0;
        this.jack = false;
        this.color = "";
        this.brand = "";
        this.storage = "";
        this.system = "";
    }

    public CellPhone(String screen, double camara, double weight, boolean jack, String color, String brand, String storage, String system) {
        this.screen = screen;
        this.camara = camara;
        this.weight = weight;
        this.jack = jack;
        this.color = color;
        this.brand = brand;
        this.storage = storage;
        this.system = system;
    }

    /**
     * @return the screen
     */
    public String getScreen() {
        return screen;
    }

    /**
     * @param screen the screen to set
     */
    public void setScreen(String screen) {
        this.screen = screen;
    }

    /**
     * @return the camara
     */
    public double getCamara() {
        return camara;
    }

    /**
     * @param camara the camara to set
     */
    public void setCamara(double camara) {
        this.camara = camara;
    }

    /**
     * @return the weight
     */
    public double getWeight() {
        return weight;
    }

    /**
     * @param weight the weight to set
     */
    public void setWeight(double weight) {
        this.weight = weight;
    }

    /**
     * @return the jack
     */
    public boolean isJack() {
        return jack;
    }

    /**
     * @param jack the jack to set
     */
    public void setJack(boolean jack) {
        this.jack = jack;
    }

    /**
     * @return the color
     */
    public String getColor() {
        return color;
    }

    /**
     * @param color the color to set
     */
    public void setColor(String color) {
        this.color = color;
    }

    /**
     * @return the brand
     */
    public String getBrand() {
        return brand;
    }

    /**
     * @param brand the brand to set
     */
    public void setBrand(String brand) {
        this.brand = brand;
    }

    /**
     * @return the storage
     */
    public String getStorage() {
        return storage;
    }

    /**
     * @param storage the storage to set
     */
    public void setStorage(String storage) {
        this.storage = storage;
    }

    /**
     * @return the system
     */
    public String getSystem() {
        return system;
    }

    /**
     * @param system the system to set
     */
    public void setSystem(String system) {
        this.system = system;
    }

    
   
}
