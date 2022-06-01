/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.computersystem.model;

/**
 *
 * @author marce
 */
public class Computer {
    
    private int id;
    private String name;
    private String model;
    private String price;
    private String color;
    private String processor;
    private String size;
    private String condition;

    public Computer() {
    }

    public Computer(int id, String name, String model, String price, String color, String processor, String size, String condition) {
        this.id = id;
        this.name = name;
        this.model = model;
        this.price = price;
        this.color = color;
        this.processor = processor;
        this.size = size;
        this.condition = condition;
    }
    
    

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getModel() {
        return model;
    }

    public void setModel(String model) {
        this.model = model;
    }

    public String getPrice() {
        return price;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public String getProcessor() {
        return processor;
    }

    public void setProcessor(String processor) {
        this.processor = processor;
    }

    public String getSize() {
        return size;
    }

    public void setSize(String size) {
        this.size = size;
    }

    public String getCondition() {
        return condition;
    }

    public void setCondition(String condition) {
        this.condition = condition;
    }
    
    
}


