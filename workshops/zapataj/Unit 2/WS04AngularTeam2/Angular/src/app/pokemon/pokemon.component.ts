import { Component, OnInit } from '@angular/core';
import { PokemonService } from '../services/pokemon.service';

@Component({
  selector: 'app-pokemon',
  templateUrl: './pokemon.component.html',
  styleUrls: ['./pokemon.component.css']
})
export class PokemonComponent implements OnInit {
  'name': string
  'urlImage': string
    
  constructor(private  pokemonServices:PokemonService){}

  ngOnInit(): void {
    
  }

  search(){
    this.pokemonServices.getPokemon(this.name).subscribe((data:any)=>{
      this.urlImage= data.sprites.front_default
    })
  }

}
