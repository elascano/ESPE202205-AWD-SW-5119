/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.model;

import Controller.MusicInst;

/**
 *
 * @author marce
 */
public abstract class DBManager {
    
    public abstract boolean create(MusicInst musicInst);
    public abstract boolean update(String name, MusicInst musicInst);
    public abstract boolean delete(String name);
    
}
