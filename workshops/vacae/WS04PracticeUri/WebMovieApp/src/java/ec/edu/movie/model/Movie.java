/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.movie.model;

/**
 *
 * @author ediso
 */
public class Movie {
    private int idMovie;
    private String name;
    private String director;
    private int duration;
    private String genre;

    public Movie() {
    }

    public Movie(int idMovie, String name, String director, int duration, String genre) {
        this.idMovie = idMovie;
        this.name = name;
        this.director = director;
        this.duration = duration;
        this.genre = genre;
    }

    /**
     * @return the idMovie
     */
    public int getIdMovie() {
        return idMovie;
    }

    /**
     * @param idMovie the idMovie to set
     */
    public void setIdMovie(int idMovie) {
        this.idMovie = idMovie;
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
     * @return the director
     */
    public String getDirector() {
        return director;
    }

    /**
     * @param director the director to set
     */
    public void setDirector(String director) {
        this.director = director;
    }

    /**
     * @return the duration
     */
    public int getDuration() {
        return duration;
    }

    /**
     * @param duration the duration to set
     */
    public void setDuration(int duration) {
        this.duration = duration;
    }

    /**
     * @return the genre
     */
    public String getGenre() {
        return genre;
    }

    /**
     * @param genre the genre to set
     */
    public void setGenre(String genre) {
        this.genre = genre;
    }
}
