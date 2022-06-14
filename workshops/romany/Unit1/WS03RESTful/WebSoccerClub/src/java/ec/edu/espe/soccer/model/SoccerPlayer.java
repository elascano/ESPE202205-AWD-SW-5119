/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.soccer.model;

/**
 *
 * @author usuario
 */
public class SoccerPlayer {
    private int id;
    private String name; 
    private String team;
    private String position;
    private int age;

    public SoccerPlayer(int id, String name, String team, String position, int age) {
        this.id = id;
        this.name = name;
        this.team = team;
        this.position = position;
        this.age = age;
    }

    public SoccerPlayer() {
        this.id = 0;
        this.name = "";
        this.team = "";
        this.age = 0;
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

    public String getTeam() {
        return team;
    }

    public void setTeam(String team) {
        this.team = team;
    }

    public String getPosition() {
        return position;
    }

    public void setPosition(String position) {
        this.position = position;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }
    
    
}
