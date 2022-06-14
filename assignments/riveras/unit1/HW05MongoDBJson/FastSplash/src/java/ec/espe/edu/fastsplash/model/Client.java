
package ec.espe.edu.fastsplash.model;

/**
 *
 * @author Christian Novoa
 */
public class Client {
    private String firstName;
    private String lastName;
    private String ci;
    private String email;
    private String bornDate;

    public Client(String firstName, String lastName, String ci, String email, String bornDate) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.ci = ci;
        this.email = email;
        this.bornDate = bornDate;
    }
    
    /**
     * @return the firstName
     */
    public String getFirstName() {
        return firstName;
    }

    /**
     * @param firstName the firstName to set
     */
    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    /**
     * @return the lastName
     */
    public String getLastName() {
        return lastName;
    }

    /**
     * @param lastName the lastName to set
     */
    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    /**
     * @return the ci
     */
    public String getCi() {
        return ci;
    }

    /**
     * @param ci the ci to set
     */
    public void setCi(String ci) {
        this.ci = ci;
    }

    /**
     * @return the email
     */
    public String getEmail() {
        return email;
    }

    /**
     * @param email the email to set
     */
    public void setEmail(String email) {
        this.email = email;
    }

    /**
     * @return the bornDate
     */
    public String getBornDate() {
        return bornDate;
    }

    /**
     * @param bornDate the bornDate to set
     */
    public void setBornDate(String bornDate) {
        this.bornDate = bornDate;
    }
    
    
}
