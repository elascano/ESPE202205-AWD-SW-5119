/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.model;

/**
 *
 * @author Fernando
 */
public class Instructor {
    private int id;
    private String name;
    private float salary;
    private boolean TC; // tiempo completo

    public Instructor() {
        id = 0;
        name = "";
        salary = 1.0F;
        TC = false;
    }    

    public Instructor(int id, String name, float salary, boolean TC) {
        this.id = id;
        this.name = name;
        this.salary = salary;
        this.TC = TC;
    }

    /**
     * @return the id
     */
    public int getId() {
        return id;
    }

    /**
     * @return the name
     */
    public String getName() {
        return name;
    }

    /**
     * @return the salary
     */
    public float getSalary() {
        return salary;
    }

    /**
     * @return the TC
     */
    public boolean isTC() {
        return TC;
    }

    /**
     * @param id the id to set
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * @param name the name to set
     */
    public void setName(String name) {
        this.name = name;
    }

    /**
     * @param salary the salary to set
     */
    public void setSalary(float salary) {
        this.salary = salary;
    }

    /**
     * @param TC the TC to set
     */
    public void setTC(boolean TC) {
        this.TC = TC;
    }

    @Override
    public String toString() {
        return "Instructor{" + "id=" + id + ", name=" + name + ", salary=" + salary + ", TC=" + TC + '}';
    }
         
}
