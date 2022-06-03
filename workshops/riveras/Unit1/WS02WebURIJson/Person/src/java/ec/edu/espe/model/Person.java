/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.model;

/**
 *
 * @author User
 */
public class Person {
    private String ci;
    private String name;
    private int age;
    private String gender;

    public Person(String ci, String name, int age, String gender) {
        this.ci = ci;
        this.name = name;
        this.age = age;
        this.gender = gender;
    }
    public Person(){
        this.ci = "";
        this.name = "";
        this.age = 0;
        this.gender = "";
        
    }

    public String getCi() {
        return ci;
    }

    public void setCi(String ci) {
        this.ci = ci;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }
    
    
    
}
