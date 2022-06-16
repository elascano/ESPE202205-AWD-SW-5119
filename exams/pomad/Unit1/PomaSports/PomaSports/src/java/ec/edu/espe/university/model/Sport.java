/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.model;

/**
 *
 * @author Fernando
 */
public class Sport {
    String id;
    String name;
    String type;
    String tags;
    String description;
    String benefits;

    public Sport() {
        id = "";
        name = "";
        type = "";
        tags = "";
        description = "";
        benefits  = "";
    }

    public Sport(String id, String name, String type, String tags, String description, String benefits) {
        this.id = id;
        this.name = name;
        this.type = type;
        this.tags = tags;
        this.description = description;
        this.benefits = benefits;
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

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getTags() {
        return tags;
    }

    public void setTags(String tags) {
        this.tags = tags;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getBenefits() {
        return benefits;
    }

    public void setBenefits(String benefits) {
        this.benefits = benefits;
    }

    @Override
    public String toString() {
        return "Sport{" + "id=" + id + ", name=" + name + ", type=" + type + ", tags=" + tags + ", description=" + description + ", benefits=" + benefits + '}';
    }
    
}
