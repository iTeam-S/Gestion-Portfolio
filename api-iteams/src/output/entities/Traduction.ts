import { Column, Entity, Index, PrimaryGeneratedColumn } from "typeorm";

@Index("cle", ["cle"], { unique: true })
@Entity("traduction", { schema: "ITEAMS" })
export class Traduction {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "cle", nullable: true, unique: true, length: 100 })
  cle: string | null;

  @Column("text", { name: "fr", nullable: true })
  fr: string | null;

  @Column("text", { name: "en", nullable: true })
  en: string | null;

  @Column("text", { name: "mg", nullable: true })
  mg: string | null;
}
