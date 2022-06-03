/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.model;

/**
 *
 * @author Henry
 */
public class Banks {
    
     private int id;
    private int celphone;
    private String name;
    private String director;
    private String manager;
    private String president;
    private String coutry;
    private String city;
    
    public Banks() {
        
        id = 0;
        celphone = 0;
        name = "";
        director = "";
        manager = "";
        president = "";
        coutry = "";
        city = "";
        
    }

    public Banks(int id, int celphone, String name, String director, String manager, String president, String coutry, String city) {
        this.id = id;
        this.celphone = celphone;
        this.name = name;
        this.director = director;
        this.manager = manager;
        this.president = president;
        this.coutry = coutry;
        this.city = city;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getCelphone() {
        return celphone;
    }

    public void setCelphone(int celphone) {
        this.celphone = celphone;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDirector() {
        return director;
    }

    public void setDirector(String director) {
        this.director = director;
    }

    public String getManager() {
        return manager;
    }

    public void setManager(String manager) {
        this.manager = manager;
    }

    public String getPresident() {
        return president;
    }

    public void setPresident(String president) {
        this.president = president;
    }

    public String getCoutry() {
        return coutry;
    }

    public void setCoutry(String coutry) {
        this.coutry = coutry;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }
    
    
}
