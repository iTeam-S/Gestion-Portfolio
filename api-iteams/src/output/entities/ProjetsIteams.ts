import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity("projetsIteams", { schema: "ITEAMS" })
export class ProjetsIteams {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "nom", length: 255 })
  nom: string;

  @Column("varchar", { name: "descriptions", nullable: true, length: 255 })
  descriptions: string | null;

  @Column("varchar", { name: "status", length: 255 })
  status: string;

  @Column("varchar", { name: "couverture", nullable: true, length: 255 })
  couverture: string | null;

  @Column("varchar", { name: "lien", length: 255 })
  lien: string;
}
