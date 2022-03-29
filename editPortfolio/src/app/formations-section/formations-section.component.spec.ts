import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormationsSectionComponent } from './formations-section.component';

describe('FormationsSectionComponent', () => {
  let component: FormationsSectionComponent;
  let fixture: ComponentFixture<FormationsSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormationsSectionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormationsSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
