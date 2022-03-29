import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FonctionSectionComponent } from './fonction-section.component';

describe('FonctionSectionComponent', () => {
  let component: FonctionSectionComponent;
  let fixture: ComponentFixture<FonctionSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FonctionSectionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FonctionSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
