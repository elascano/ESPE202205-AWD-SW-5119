/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.utilities;

/**
 *
 * @author User
 */
public abstract class DBManager {
    protected String user;
    protected String password;
    protected boolean isConnect;
    protected String url;
    
    public abstract boolean connect();
    public abstract String insertData(String data);
}