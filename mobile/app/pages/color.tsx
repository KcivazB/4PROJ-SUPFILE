import { View, Text, StyleSheet, TouchableOpacity, ScrollView } from 'react-native';
import { useRouter } from 'expo-router';
import { Colors } from '@/constants/Colors';
import NavBar from '../nav-bar';
import TopBar from '../top-bar';

export default function ColorPage() {
  const router = useRouter();

  const colorEntries = Object.entries(Colors.light);

  return (
    <View style={styles.container}>
      <TopBar />
      <View style={styles.content}>
        <TouchableOpacity 
          style={styles.backButton}
          onPress={() => router.back()}
        >
          <Text style={styles.backButtonText}>← Retour à l'index</Text>
        </TouchableOpacity>

        <Text style={styles.title}>Palette de Couleurs</Text>

        <ScrollView style={styles.scrollView} contentContainerStyle={styles.scrollContent}>
          {colorEntries.map(([key, value]) => (
            <View 
              key={key}
              style={[styles.colorBox, { backgroundColor: value }]}
            >
              <Text style={styles.colorText}>{key}</Text>
              <Text style={styles.colorHex}>{value}</Text>
            </View>
          ))}
        </ScrollView>
      </View>
      
      <NavBar />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  content: {
    flex: 1,
    padding: 20,
  },
  backButton: {
    backgroundColor: '#647EE8',
    padding: 12,
    borderRadius: 8,
    marginBottom: 10,
    marginTop: 10,
  },
  backButtonText: {
    color: '#fff',
    fontSize: 16,
    fontWeight: '600',
    textAlign: 'center',
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 20,
    color: '#362E7D',
  },
  scrollView: {
    flex: 1,
  },
  scrollContent: {
    paddingBottom: 20,
  },
  colorBox: {
    height: 100,
    marginBottom: 15,
    borderRadius: 10,
    justifyContent: 'center',
    alignItems: 'center',
    borderWidth: 1,
    borderColor: '#C9C9C9',
  },
  colorText: {
    fontSize: 16,
    fontWeight: 'bold',
    marginBottom: 5,
  },
  colorHex: {
    fontSize: 14,
    fontWeight: '500',
  },
});
