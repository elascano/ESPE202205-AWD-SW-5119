/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.model;

import java.util.Date;

/**
 *
 * @author Stalin Rivera
 */
public class Universities {
    private String idUniversities;
    private String name;
    private String address;
    private String telephone;
    private String mail;
    private String type;
    private String date;

    public Universities(String idUniversities, String name, String address, String telephone, String mail, String type, String date) {
        this.idUniversities = idUniversities;
        this.name = name;
        this.address = address;
        this.telephone = telephone;
        this.mail = mail;
        this.type = type;
        this.date = date;
    }

    public String getIdUniversities() {
        return idUniversities;
    }

    public void setIdUniversities(String idUniversities) {
        this.idUniversities = idUniversities;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getTelephone() {
        return telephone;
    }

    public void setTelephone(String telephone) {
        this.telephone = telephone;
    }

    public String getMail() {
        return mail;
    }

    public void setMail(String mail) {
        this.mail = mail;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }


    
}
