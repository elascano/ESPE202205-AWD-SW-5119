/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package soccer;

/**
 *
 * @author G401
 */
public class SoccerPlayer {
    private int id;
    private String name;
    private String lastName;
    private String nickName;
    private String position;
    private int numPlayer;
    private String soccerTeam;
    private String nationality;

    public SoccerPlayer() {
        this.id = 0;
        this.name = "";
        this.lastName = "";
        this.nickName = "";
        this.position = "";
        this.numPlayer = 0;
        this.soccerTeam = "";
        this.nationality = "";
    }
    
    public SoccerPlayer(int id, String name, String lastName, String nickName, String position, int numPlayer, String soccerTeam, String nationality) {
        this.id = id;
        this.name = name;
        this.lastName = lastName;
        this.nickName = nickName;
        this.position = position;
        this.numPlayer = numPlayer;
        this.soccerTeam = soccerTeam;
        this.nationality = nationality;
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

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getNickName() {
        return nickName;
    }

    public void setNickName(String nickName) {
        this.nickName = nickName;
    }

    public String getPosition() {
        return position;
    }

    public void setPosition(String position) {
        this.position = position;
    }

    public int getNumPlayer() {
        return numPlayer;
    }

    public void setNumPlayer(int numPlayer) {
        this.numPlayer = numPlayer;
    }

    public String getSoccerTeam() {
        return soccerTeam;
    }

    public void setSoccerTeam(String soccerTeam) {
        this.soccerTeam = soccerTeam;
    }

    public String getNationality() {
        return nationality;
    }

    public void setNationality(String nationality) {
        this.nationality = nationality;
    }
    
    
    
}
