/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.vinyl.model;

/**
 *
 * @author usuario
 */
public class vinyl {
    private String company;
    private int id;
    private String album;
    private String band;
    private String year;
    private String day;
    private String description;
    private int duration;
    private int songs;

    public vinyl() {
        this.company = "";
        this.album = "";
        this.band = "";
        this.year = "";
        this.day = "";
        this.description = "";
        this.duration =0 ;
        this.songs =0;
        this.id= 0;
    }

    public vinyl(String company, int id, String album, String band, String year, String day, String description, int duration, int songs) {
        this.company = company;
        this.id = id;
        this.album = album;
        this.band = band;
        this.year = year;
        this.day = day;
        this.description = description;
        this.duration = duration;
        this.songs = songs;
    }

    public String getCompany() {
        return company;
    }

    public void setCompany(String company) {
        this.company = company;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getAlbum() {
        return album;
    }

    public void setAlbum(String album) {
        this.album = album;
    }

    public String getBand() {
        return band;
    }

    public void setBand(String band) {
        this.band = band;
    }

    public String getYear() {
        return year;
    }

    public void setYear(String year) {
        this.year = year;
    }

    public String getDay() {
        return day;
    }

    public void setDay(String day) {
        this.day = day;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public int getDuration() {
        return duration;
    }

    public void setDuration(int duration) {
        this.duration = duration;
    }

    public int getSongs() {
        return songs;
    }

    public void setSongs(int songs) {
        this.songs = songs;
    }

    
}
