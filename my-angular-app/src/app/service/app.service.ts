import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, map } from 'rxjs';
import { Card } from '../model/card';

@Injectable({
  providedIn: 'root',
})
export class CardService {

  private apiUrl = 'http://localhost:8741/api'; 

  constructor(private http: HttpClient) {}

  getCards(): Observable<{status: string, message: string, data: Card[]}> {
    return this.http.get<{status: string, message: string, data: Card[]}>(`${this.apiUrl}/cards`);
  }

  getCardsSorted(cards: Card[]): Observable<{status: string, message: string, data: Card[]}> {
    return this.http.post<{status: string, message: string, data: Card[]}>(`${this.apiUrl}/cards/sorted`, cards);
  }
}