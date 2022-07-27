/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.model;

/**
 *
 * @author USUARIO
 */
public class Furniture {

    private int idFurniture;
    private String name;
    private String adress;
    private String date;
    private String endurance;
    private String color;
    private String type;
    private int persons;

   public Furniture(){
    }
    
    public Furniture(int idFurniture, String name, String adress, String date, String endurance, String color, String type, int persons) {
        this.idFurniture = idFurniture;
        this.name = name;
        this.adress = adress;
        this.date = date;
        this.endurance = endurance;
        this.color = color;
        this.type = type;
        this.persons = persons;
    }

    
    
    /**
     * @return the idFurniture
     */
    public int getIdFurniture() {
        return idFurniture;
    }

    /**
     * @param idFurniture the idFurniture to set
     */
    public void setIdFurniture(int idFurniture) {
        this.idFurniture = idFurniture;
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
     * @return the adress
     */
    public String getAdress() {
        return adress;
    }

    /**
     * @param adress the adress to set
     */
    public void setAdress(String adress) {
        this.adress = adress;
    }

    /**
     * @return the date
     */
    public String getDate() {
        return date;
    }

    /**
     * @param date the date to set
     */
    public void setDate(String date) {
        this.date = date;
    }

    /**
     * @return the endurance
     */
    public String getEndurance() {
        return endurance;
    }

    /**
     * @param endurance the endurance to set
     */
    public void setEndurance(String endurance) {
        this.endurance = endurance;
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
     * @return the persons
     */
    public int getPersons() {
        return persons;
    }

    /**
     * @param persons the persons to set
     */
    public void setPersons(int persons) {
        this.persons = persons;
    }

   
  

}
