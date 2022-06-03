/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.record.model;

/**
 *
 * @author Sebastian
 */
public class Vynil {
    private int idDisc;
    private String name;
    private String artist;
    private int duration;
    private String genre;
    private String year;
    private String producer;
    private int reproductions;

    public Vynil() {
    }

    public Vynil(int idDisc, String name, String artist, int duration, String genre, String year, String producer, int reproductions) 
    {
        this.idDisc = idDisc;
        this.name = name;
        this.artist = artist;
        this.duration = duration;
        this.genre = genre;
        this.year = year;
        this.producer = producer;
        this.reproductions = reproductions;
    }


    public int getIdDisc() {
        return idDisc;
    }

    public void setIdMovie(int idDisc) {
        this.idDisc = idDisc;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getArtist() {
        return artist;
    }

    public void setArtist(String artist) {
        this.artist = artist;
    }

    public int getDuration() {
        return duration;
    }

    public void setDuration(int duration) {
        this.duration = duration;
    }

    public String getGenre() {
        return genre;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }
            
    public String getYear() {
        return year;
    }

    public void setYear(String year) {
        this.year = year;
    }
    
    public String getProducer() {
        return producer;
    }

    public void setProducer(String producer) {
        this.producer = producer;
    }
    
     public int getReporductions() {
        return reproductions;
    }

    public void setDurationReproductions(int reproductions) {
        this.reproductions = reproductions;
    }
}
