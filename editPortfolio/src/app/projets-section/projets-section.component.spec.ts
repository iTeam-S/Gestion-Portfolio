import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProjetsSectionComponent } from './projets-section.component';

describe('ProjetsSectionComponent', () => {
  let component: ProjetsSectionComponent;
  let fixture: ComponentFixture<ProjetsSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ProjetsSectionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ProjetsSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
