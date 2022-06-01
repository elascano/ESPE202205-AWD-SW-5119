/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.model;

/**
 *
 * @author User
 */
public class Instructor {
private int id;
    private String name;
    private float salary;
    private boolean TC;

    public Instructor(int id, String name, float salary, boolean TC) {
        this.id = id;
        this.name = name;
        this.salary = salary;
        this.TC = TC;
    }

    public Instructor() {
        this.id = 0;
        this.name = "";
        this.salary = 0;
        this.TC = false;
        
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

    public float getSalary() {
        return salary;
    }

    public void setSalary(float salary) {
        this.salary = salary;
    }

    public boolean isTC() {
        return TC;
    }

    public void setTC(boolean TC) {
        this.TC = TC;
    }
    
}
