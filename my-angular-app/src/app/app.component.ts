import { Component, OnInit } from '@angular/core';
import { MatButtonModule } from '@angular/material/button';
import { MatCardModule } from '@angular/material/card';
import { MatGridListModule } from '@angular/material/grid-list';
import { CommonModule } from '@angular/common';
import { MatIconModule } from '@angular/material/icon';
import { CardService } from '././service/app.service';
import { Card } from './model/card';


@Component({
  selector: 'app-root',
  imports: [
    MatCardModule,
    MatButtonModule,
    MatGridListModule,
    CommonModule,
    MatIconModule,
  ],
  standalone: true,
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})

export class AppComponent implements OnInit {
  title = 'card';
  cards: Card[] = [];
  sortedCards: Card[] = [];

  constructor(private cardService: CardService) {}

  ngOnInit(): void {
    this.shuffleCards();
  }

  categorySymbols: { [key: string]: string } = {
    'Carreaux': '♦', 
    'Coeur': '♥',    
    'Pique': '♠',    
    'Trefle': '♣'    
  };

  categoryColors: { [key: string]: string } = {
    'Carreaux': 'red',       
    'Coeur': 'red',         
    'Pique': 'black',        
    'Trefle': 'black'       
  };

  shuffleCards()
  { 
    this.cardService.getCards().subscribe((response) => {
      this.cards = response.data;
    });
  }

  getCategoryColor(category: string): string {
    return this.categoryColors[category] || 'black';  
  }
  
  sortCards() {
    this.cardService.getCardsSorted(this.cards).subscribe((response) => {
      this.cards = response.data;
    });
  }

  getFontSize(cardNumber: string): string {
    return cardNumber.length <= 2 ? '280%' : '220%';
  }
}
  