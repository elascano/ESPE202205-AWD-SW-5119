/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.webtruck.model;

/**
 *
 * @author yepec
 */
public class Truck {
    private int id;
    private String name;
    private String brand;
    private String primaryColor;
    private String secondaryColor;
    private int yearOfRealease;
    private float price;
    private boolean isAvailable;

    public Truck() {
    }

    public Truck(int id, String name, String brand, String primaryColor, String secondaryColor, int yearOfRealease, float price, boolean isAvailable) {
        this.id = id;
        this.name = name;
        this.brand = brand;
        this.primaryColor = primaryColor;
        this.secondaryColor = secondaryColor;
        this.yearOfRealease = yearOfRealease;
        this.price = price;
        this.isAvailable = isAvailable;
    }

    /**
     * @return the id
     */
    public int getId() {
        return id;
    }

    /**
     * @param id the id to set
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * @return the name
     */
    public String getName() {
        return name;
    }

    /**
     * @param name the name to set
     */
    public void setName(String name) {
        this.name = name;
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
     * @return the primaryColor
     */
    public String getPrimaryColor() {
        return primaryColor;
    }

    /**
     * @param primaryColor the primaryColor to set
     */
    public void setPrimaryColor(String primaryColor) {
        this.primaryColor = primaryColor;
    }

    /**
     * @return the secondaryColor
     */
    public String getSecondaryColor() {
        return secondaryColor;
    }

    /**
     * @param secondaryColor the secondaryColor to set
     */
    public void setSecondaryColor(String secondaryColor) {
        this.secondaryColor = secondaryColor;
    }

    /**
     * @return the yearOfRealease
     */
    public int getYearOfRealease() {
        return yearOfRealease;
    }

    /**
     * @param yearOfRealease the yearOfRealease to set
     */
    public void setYearOfRealease(int yearOfRealease) {
        this.yearOfRealease = yearOfRealease;
    }

    /**
     * @return the price
     */
    public float getPrice() {
        return price;
    }

    /**
     * @param price the price to set
     */
    public void setPrice(float price) {
        this.price = price;
    }

    /**
     * @return the isAvailable
     */
    public boolean isIsAvailable() {
        return isAvailable;
    }

    /**
     * @param isAvailable the isAvailable to set
     */
    public void setIsAvailable(boolean isAvailable) {
        this.isAvailable = isAvailable;
    }

    @Override
    public String toString() {
        return "Truck{" + "id=" + id + ", name=" + name + ", brand=" + brand + ", primaryColor=" + primaryColor + ", secondaryColor=" + secondaryColor + ", yearOfRealease=" + yearOfRealease + ", price=" + price + ", isAvailable=" + isAvailable + '}';
    }
    
    
    
}
