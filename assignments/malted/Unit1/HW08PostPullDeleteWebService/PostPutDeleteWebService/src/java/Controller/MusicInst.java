/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controller;

/**
 *
 * @author marce
 */
public class MusicInst {
    private String name;
    private String clasification;
    private String size;
    private String type;
    private String price;

    public MusicInst() {
    }

    public MusicInst(String name, String clasification, String size, String type, String price) {
        this.name = name;
        this.clasification = clasification;
        this.size = size;
        this.type = type;
        this.price = price;
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
     * @return the clasification
     */
    public String getClasification() {
        return clasification;
    }

    /**
     * @param clasification the clasification to set
     */
    public void setClasification(String clasification) {
        this.clasification = clasification;
    }

    /**
     * @return the size
     */
    public String getSize() {
        return size;
    }

    /**
     * @param size the size to set
     */
    public void setSize(String size) {
        this.size = size;
    }

    /**
     * @return the type
     */
    public String getType() {
        return type;
    }

    /**
     * @param type the type to set
     */
    public void setType(String type) {
        this.type = type;
    }

    /**
     * @return the price
     */
    public String getPrice() {
        return price;
    }

    /**
     * @param price the price to set
     */
    public void setPrice(String price) {
        this.price = price;
    }   
    
}
