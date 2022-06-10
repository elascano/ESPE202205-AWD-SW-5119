/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.soccerteams.model;

/**
 *
 * @author santy
 */
public class SoccerTeam {
    String id;
    String name;
    int numberPlayers;
    String rankTeam;
    String region;
    String category;
    int numberForeigners;
    float templateCost;

    public SoccerTeam(String id, String name, int numberPlayers, String rankTeam, String region, String category, int numberForeigners, float templateCost) {
        this.id = id;
        this.name = name;
        this.numberPlayers = numberPlayers;
        this.rankTeam = rankTeam;
        this.region = region;
        this.category = category;
        this.numberForeigners = numberForeigners;
        this.templateCost = templateCost;
    }
    
    public SoccerTeam(){
        id="";
        name="";
        numberPlayers=0;
        rankTeam="";
        region="";
        category="";
        numberForeigners=0;
        templateCost=0.0F;
        
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getNumberPlayers() {
        return numberPlayers;
    }

    public void setNumberPlayers(int numberPlayers) {
        this.numberPlayers = numberPlayers;
    }

    public String getRankTeam() {
        return rankTeam;
    }

    public void setRankTeam(String rankTeam) {
        this.rankTeam = rankTeam;
    }

    public String getRegion() {
        return region;
    }

    public void setRegion(String region) {
        this.region = region;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public int getNumberForeigners() {
        return numberForeigners;
    }

    public void setNumberForeigners(int numberForeigners) {
        this.numberForeigners = numberForeigners;
    }

    public float getTemplateCost() {
        return templateCost;
    }

    public void setTemplateCost(float templateCost) {
        this.templateCost = templateCost;
    }

    @Override
    public String toString() {
        return "SoccerTeam{" + "id=" + id + ", name=" + name + ", numberPlayers=" + numberPlayers + ", rankTeam=" + rankTeam + ", region=" + region + ", category=" + category + ", numberForeigners=" + numberForeigners + ", templateCost=" + templateCost + '}';
    }
    
    
}

