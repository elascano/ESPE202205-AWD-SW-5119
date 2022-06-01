/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.watch.model;

/**
 *
 * @author HP
 */
public class SmartWatch {
    private int idSmart;
    private String size;
    private float price;
    private String color;
    private boolean resistenceWater;
    private String mark;
    private String market;
    private String software;

    public SmartWatch() {
    }

    public SmartWatch(int idSmart, String size, float price, String color, boolean resistenceWater, String mark, String market, String software) {
        this.idSmart = idSmart;
        this.size = size;
        this.price = price;
        this.color = color;
        this.resistenceWater = resistenceWater;
        this.mark = mark;
        this.market = market;
        this.software = software;
    }

    public int getIdSmart() {
        return idSmart;
    }

    public void setIdSmart(int idSmart) {
        this.idSmart = idSmart;
    }

    public String getSize() {
        return size;
    }

    public void setSize(String size) {
        this.size = size;
    }

    public float getPrice() {
        return price;
    }

    public void setPrice(float price) {
        this.price = price;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public boolean isResistenceWater() {
        return resistenceWater;
    }

    public void setResistenceWater(boolean resistenceWater) {
        this.resistenceWater = resistenceWater;
    }

    public String getMark() {
        return mark;
    }

    public void setMark(String mark) {
        this.mark = mark;
    }

    public String getMarket() {
        return market;
    }

    public void setMarket(String market) {
        this.market = market;
    }

    public String getSoftware() {
        return software;
    }

    public void setSoftware(String software) {
        this.software = software;
    }
    
    
}
