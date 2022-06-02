/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.model;

/**
 *
 * @author Home
 */
public class Parks {
    
    private String name;
    private String cityLocation;
    private String cityAdress;
    private double area ;
    private int numberChairs;
    private int capacity;
    private double hight;
    private double lenght;

    public Parks(String name, String cityLocation, String cityAdress, double area, int numberChairs, int capacity, double hight, double lenght) {
        this.name = name;
        this.cityLocation = cityLocation;
        this.cityAdress = cityAdress;
        this.area = area;
        this.numberChairs = numberChairs;
        this.capacity = capacity;
        this.hight = hight;
        this.lenght = lenght;
    }

    public Parks() {
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getCityLocation() {
        return cityLocation;
    }

    public void setCityLocation(String cityLocation) {
        this.cityLocation = cityLocation;
    }

    public String getCityAdress() {
        return cityAdress;
    }

    public void setCityAdress(String cityAdress) {
        this.cityAdress = cityAdress;
    }

    public double getArea() {
        return area;
    }

    public void setArea(double area) {
        this.area = area;
    }

    public int getNumberChairs() {
        return numberChairs;
    }

    public void setNumberChairs(int numberChairs) {
        this.numberChairs = numberChairs;
    }

    public int getCapacity() {
        return capacity;
    }

    public void setCapacity(int capacity) {
        this.capacity = capacity;
    }

    public double getHight() {
        return hight;
    }

    public void setHight(double hight) {
        this.hight = hight;
    }

    public double getLenght() {
        return lenght;
    }

    public void setLenght(double lenght) {
        this.lenght = lenght;
    }

    
    
}
