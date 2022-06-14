/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.aplication.model;

/**
 *
 * @author ediso
 */
public class Instructor {
    private int id;
    private String name;
    private float salary;
    private boolean TC;

    public Instructor() {
        id = 0;
        name = "";
        salary = 1.0F;
    }

    public Instructor(int id, String name, float salary, boolean TCP) {
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
     * @param id the id to set
     */
    public void setId(int id) {
        this.id = id;
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
     * @return the salary
     */
    public float getSalary() {
        return salary;
    }

    /**
     * @param salary the salary to set
     */
    public void setSalary(float salary) {
        this.salary = salary;
    }

    /**
     * @return the TCP
     */
    public boolean isTC() {
        return TC;
    }

    /**
     * @param TCP the TCP to set
     */
    public void setTC(boolean TCP) {
        this.TC = TCP;
    }
}
