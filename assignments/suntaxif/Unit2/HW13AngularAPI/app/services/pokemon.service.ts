import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PokemonService {

  private url: string = "https://pokeapi.co/api/v2/pokemon";


  constructor(private hhtp : HttpClient) { }

  getPokemon(name: string){
    return this.hhtp.get(`${this.url}/${name}`);
  }
}
