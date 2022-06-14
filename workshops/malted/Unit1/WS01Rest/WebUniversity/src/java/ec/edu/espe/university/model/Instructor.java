
package ec.edu.espe.university.model;

/**
 *
 * @author marce
 */
public class Instructor {
    private int id;
    private String name;
    private float Salary;
    private boolean TC;

    public Instructor() {
        id = 0;
        name = "";
        Salary = 1.0F;
        TC = false;
    }
        
    public Instructor(int id, String name, float Salary, boolean TC) {
        this.id = id;
        this.name = name;
        this.Salary = Salary;
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
     * @return the Salary
     */
    public float getSalary() {
        return Salary;
    }

    /**
     * @param Salary the Salary to set
     */
    public void setSalary(float Salary) {
        this.Salary = Salary;
    }

    /**
     * @return the TC
     */
    public boolean isTC() {
        return TC;
    }

    /**
     * @param TC the TC to set
     */
    public void setTC(boolean TC) {
        this.TC = TC;
    }
    
    
    
    
}
