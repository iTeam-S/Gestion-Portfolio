import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CompetencesSectionComponent } from './competences-section.component';

describe('CompetencesSectionComponent', () => {
  let component: CompetencesSectionComponent;
  let fixture: ComponentFixture<CompetencesSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CompetencesSectionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CompetencesSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
